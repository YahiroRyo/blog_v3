import Image from 'next/image';
import Link from 'next/link';
import { CSSProperties } from 'react';
import { color } from '../../../../styles/color';
import Text from '../../../atoms/Text/Text';
import Title from '../../../atoms/Text/Title';

type BlogCardProps = {
  blogId: string;
  title: string;
  thumbnail: string;
  isActive: boolean;
  style?: CSSProperties;
};

const BlogCard = ({ blogId, title, thumbnail, isActive, style }: BlogCardProps) => {
  return (
    <article
      style={{
        ...style,
        borderRadius: '3rem',
        boxShadow: isActive ? '0.8rem 0.8rem 2rem rgba(0, 0, 0, .25)' : '',
      }}
    >
      <Link href={`/admin/blogs/${blogId}`}>
        <a
          style={{
            backgroundColor: isActive ? color.white : color.gray,
            borderRadius: '1rem',
            padding: '2rem',
            display: 'flex',
            columnGap: '2rem',
            textDecoration: 'none',
          }}
        >
          <Image src={thumbnail} width={400} height={225} alt={`${title}のサムネイル`} />
          <div>
            <Text>表示ステータス：{isActive ? '表示' : '非表示'}</Text>
            <Title>{title}</Title>
          </div>
        </a>
      </Link>
    </article>
  );
};

export default BlogCard;
