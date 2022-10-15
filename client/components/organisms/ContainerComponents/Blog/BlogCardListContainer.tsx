import axios from 'axios';
import { useEffect, useState } from 'react';
import BlogCardList from '../../PresentationalComponents/Blog/BlogCardList';

const BlogCardListContainer = () => {
  const [blogList, setBlogList] = useState<any>([]);

  useEffect(() => {
    const main = async () => {
      const response = await axios.get(`${process.env.NEXT_PUBLIC_API_URL}/api/blogs`);
      setBlogList(response.data);
    };
    main();
  }, []);

  return <BlogCardList blogList={blogList} />;
};

export default BlogCardListContainer;
