import { ActiveBlog } from '../../../../types/Blog/ActiveBlog';
import BlogCard from './ActiveBlogCard';

type ActiveBlogCardListProps = {
  blogList: ActiveBlog[];
};

const ActiveBlogCardList = ({ blogList }: ActiveBlogCardListProps) => {
  return (
    <>
      {blogList.map((blog: any, key: number) => (
        <BlogCard key={key} {...blog} />
      ))}
    </>
  );
};

export default ActiveBlogCardList;
