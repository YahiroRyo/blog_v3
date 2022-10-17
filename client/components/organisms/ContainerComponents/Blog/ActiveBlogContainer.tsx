import axios from 'axios';
import { useRouter } from 'next/router';
import useSWR from 'swr';
import { DetailActiveBlog } from '../../../../types/Blog/DetailActiveBlog';
import { markdownOfHTML } from '../../../../wasm-markdown/pkg/wasm_markdown';
import ActiveBlog from '../../PresentationalComponents/Blog/ActiveBlog';

const ActiveBlogContainer = () => {
  const router = useRouter();
  const fecher = async () => {
    const preBlog = (
      await axios.get<DetailActiveBlog>(`${process.env.NEXT_PUBLIC_API_URL}/api/blogs/${router.query.blogId}`)
    ).data;

    const blog = {
      ...preBlog,
      body: markdownOfHTML(preBlog.body),
    };

    const description = preBlog.body.replaceAll('#', '').substring(0, 120);

    return { ...blog, description: description };
  };
  const { data, error } = useSWR(`${process.env.NEXT_PUBLIC_API_URL}/api/blogs/${router.query.blogId}`, fecher);

  if (error) return <>error</>;
  if (!data) return <>loading...</>;

  return <ActiveBlog {...data} />;
};

export default ActiveBlogContainer;
