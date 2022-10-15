import BlogCard from './BlogCard';

type BlogCardListProps = {
  blogList: any;
};

const BlogCardList = ({ blogList }: BlogCardListProps) => {
  return blogList.map((blog: any, key: number) => <BlogCard key={key} {...blog} />);
};

export default BlogCardList;
