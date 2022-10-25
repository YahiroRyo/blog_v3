/** @jsxImportSource @emotion/react */
import { css } from '@emotion/react';
import { Blog } from '../../../../types/Blog/Blog';
import BlogCard from './BlogCard';

type BlogCardListProps = {
  blogList: Blog[];
};

const BlogCardList = ({ blogList }: BlogCardListProps) => {
  return (
    <>
      {blogList.map((blog: any, key: number) => (
        <BlogCard
          style={css`
            margin: 2rem 0;
          `}
          key={key}
          {...blog}
        />
      ))}
    </>
  );
};

export default BlogCardList;
