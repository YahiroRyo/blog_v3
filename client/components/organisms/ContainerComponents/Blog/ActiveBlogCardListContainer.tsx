import axios from 'axios';
import useSWR from 'swr';
import { ActiveBlog } from '../../../../types/Blog/ActiveBlog';
import ActiveBlogCardList from '../../PresentationalComponents/Blog/ActiveBlogCardList';

const ActiveBlogCardListContainer = () => {
  const fecher = async () => {
    return (await axios.get<ActiveBlog[]>(`${process.env.NEXT_PUBLIC_API_URL}/api/blogs`)).data;
  };
  const { data, error } = useSWR(`${process.env.NEXT_PUBLIC_API_URL}/api/blogs`, fecher);

  if (error) return <>error</>;
  if (!data) return <>loading...</>;

  return <ActiveBlogCardList blogList={data} />;
};

export default ActiveBlogCardListContainer;
