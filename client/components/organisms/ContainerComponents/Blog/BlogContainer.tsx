import axios from 'axios';
import { useRouter } from 'next/router';
import useSWR from 'swr';
import { DetailBlog } from '../../../../types/Blog/DetailBlog';
import { markdownOfHTML } from '../../../../wasm-markdown/pkg/wasm_markdown';
import Blog from '../../PresentationalComponents/Blog/Blog';

const BlogContainer = () => {
  const router = useRouter();

  const fecher = async () => {
    if (!sessionStorage.getItem('token')) return;

    const preBlog = (
      await axios.get<DetailBlog>(`${process.env.NEXT_PUBLIC_API_URL}/api/admin/blogs/${router.query.blogId}`, {
        headers: {
          Authorization: `Bearer ${sessionStorage.getItem('token')}`,
        },
      })
    ).data;

    const blog = {
      ...preBlog,
      body: markdownOfHTML(preBlog.body),
    };

    return blog;
  };

  const { data, error } = useSWR(`${process.env.NEXT_PUBLIC_API_URL}/api/admin/blogs/${router.query.blogId}`, fecher);

  if (error) return <>error</>;
  if (!data) return <>loading...</>;

  return <Blog {...data} />;
};

export default BlogContainer;
