import axios from 'axios';
import { useRouter } from 'next/router';
import { FormEvent, useEffect, useState } from 'react';
import { DetailBlog } from '../../../../types/Blog/DetailBlog';
import EditBlogForm from '../../PresentationalComponents/Blog/EditBlogForm';

const EditBlogContainer = () => {
  const router = useRouter();
  const [title, setTitle] = useState<string>('');
  const [body, setBody] = useState<string>('');
  const [error, setError] = useState<string>('');
  const [isActive, setIsActive] = useState<boolean>(false);
  const [mainImage, setMainImage] = useState<File>();
  const [mainImageBase64, setMainImageBase64] = useState<string>('');

  const editBlog = async (e: FormEvent<HTMLFormElement>) => {
    e.preventDefault();

    if (!sessionStorage.getItem('token')) return;

    if (mainImage) {
      const formData = new FormData();
      formData.append('blogId', router.query.blogId as string);
      formData.append('mainImage', mainImage as Blob);
      formData.append('_method', 'PUT');

      try {
        await axios.post(`${process.env.NEXT_PUBLIC_API_URL}/api/admin/blogs/mainImage`, formData, {
          headers: {
            Authorization: `Bearer ${sessionStorage.getItem('token')}`,
          },
        });
      } catch (e) {
        if (!axios.isAxiosError(e)) {
          setError('不明なエラーが発生しました');
          return;
        }
      }
    }

    try {
      await axios.put(
        `${process.env.NEXT_PUBLIC_API_URL}/api/admin/blogs`,
        {
          blogId: router.query.blogId,
          title: title,
          body: body,
          isActive: isActive,
        },
        {
          headers: {
            Authorization: `Bearer ${sessionStorage.getItem('token')}`,
          },
        },
      );
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

  useEffect(() => {
    const main = async () => {
      if (!sessionStorage.getItem('token') || !router.query.blogId) return;

      try {
        const response = await axios.get<DetailBlog>(
          `${process.env.NEXT_PUBLIC_API_URL}/api/admin/blogs/${router.query.blogId}`,
          {
            headers: {
              Authorization: `Bearer ${sessionStorage.getItem('token')}`,
            },
          },
        );

        setTitle(response.data.title);
        setBody(response.data.body);
        setMainImageBase64(response.data.mainImage);
        setIsActive(response.data.isActive);
      } catch (e) {
        setError('不明なエラーが発生しました。');
      }
    };

    main();
  }, [router.query.blogId]);

  return (
    <EditBlogForm
      editBlog={editBlog}
      title={title}
      mainImage={mainImageBase64}
      isActive={isActive}
      body={body}
      error={error}
      setTitle={setTitle}
      setBody={setBody}
      setMainImage={setMainImage}
      setIsActive={setIsActive}
    />
  );
};

export default EditBlogContainer;
