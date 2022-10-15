import axios from 'axios';
import { useEffect, useState } from 'react';
import { ActiveBlog } from '../../../../types/Blog/ActiveBlog';
import ActiveBlogCardList from '../../PresentationalComponents/Blog/ActiveBlogCardList';

const ActiveBlogCardListContainer = () => {
  const [blogList, setBlogList] = useState<ActiveBlog[]>([]);

  useEffect(() => {
    const main = async () => {
      const response = await axios.get<ActiveBlog[]>(`${process.env.NEXT_PUBLIC_API_URL}/api/blogs`);
      setBlogList(response.data);
    };
    main();
  }, []);

  return <ActiveBlogCardList blogList={blogList} />;
};

export default ActiveBlogCardListContainer;
