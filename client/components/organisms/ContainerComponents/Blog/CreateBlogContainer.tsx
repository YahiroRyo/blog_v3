import axios from 'axios';
import { useRouter } from 'next/router';
import { FormEvent, useEffect, useState } from 'react';
import CreateBlogForm from '../../PresentationalComponents/Blog/CreateBlogForm';

const CreateBlogContainer = () => {
  const router = useRouter();
  const [title, setTitle] = useState<string>('');
  const [body, setBody] = useState<string>('');
  const [error, setError] = useState<string>('');
  const [mainImage, setMainImage] = useState<File>();
  const [mainImageBase64, setMainImageBase64] = useState<string>('');

  const createBlog = async (e: FormEvent<HTMLFormElement>) => {
    e.preventDefault();

    if (!sessionStorage.getItem('token')) return;

    try {
      const formData = new FormData();
      formData.append('title', title);
      formData.append('body', body);
      formData.append('mainImage', mainImage as Blob);

      await axios.post(`${process.env.NEXT_PUBLIC_API_URL}/api/admin/blogs`, formData, {
        headers: {
          Authorization: `Bearer ${sessionStorage.getItem('token')}`,
        },
      });
      router.push('/admin/blogs');
    } catch (e) {
      if (!axios.isAxiosError(e)) {
        setError('不明なエラーが発生しました');
        return;
      }
    }
  };

  useEffect(() => {
    if (!mainImage) return;

    const reader = new FileReader();
    reader.onload = () => {
      setMainImageBase64(reader.result?.toString()!);
    };
    reader.readAsDataURL(mainImage);
  }, [mainImage]);

  return (
    <CreateBlogForm
      createBlog={createBlog}
      title={title}
      mainImageBase64={mainImageBase64}
      body={body}
      error={error}
      setTitle={setTitle}
      setBody={setBody}
      setMainImage={setMainImage}
    />
  );
};

export default CreateBlogContainer;
