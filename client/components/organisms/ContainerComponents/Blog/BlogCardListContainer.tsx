import axios from 'axios';
import useSWR from 'swr';
import { Blog } from '../../../../types/Blog/Blog';
import { getCookie } from '../../../../utils/Cookie';
import BlogCardList from '../../PresentationalComponents/Blog/BlogCardList';

const BlogCardListContainer = () => {
  const fecher = async () => {
    const cookie = getCookie(document.cookie);
    if ('token' in cookie) return;

    return (
      await axios.get<Blog[]>(`${process.env.NEXT_PUBLIC_API_URL}/api/admin/blogs`, {
        headers: {
          Authorization: `Bearer ${cookie['token']}`,
        },
      })
    ).data;
  };
  const { data, error } = useSWR(`${process.env.NEXT_PUBLIC_API_URL}/api/admin/blogs`, fecher);

  if (error) return <>error</>;
  if (!data) return <>loading...</>;

  return <BlogCardList blogList={data} />;
};

export default BlogCardListContainer;
