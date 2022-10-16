import Image from 'next/image';
import Link from 'next/link';
import { CSSProperties } from 'react';
import { color } from '../../../../styles/color';
import Title from '../../../atoms/Text/Title';

type ActiveBlogCardProps = {
  blogId: string;
  title: string;
  thumbnail: string;
  style?: CSSProperties;
};

const ActiveBlogCard = ({ blogId, title, thumbnail, style }: ActiveBlogCardProps) => {
  return (
    <article style={{ ...style, borderRadius: '3rem', boxShadow: '0.8rem 0.8rem 2rem rgba(0, 0, 0, .25)' }}>
      <Link href={`/blogs/${blogId}`}>
        <a
          style={{
            backgroundColor: color.white,
            borderRadius: '1rem',
            padding: '2rem',
            display: 'flex',
            columnGap: '2rem',
            textDecoration: 'none',
          }}
        >
          <Image src={thumbnail} width={400} height={225} alt={`${title}のサムネイル`} />
          <Title>{title}</Title>
        </a>
      </Link>
    </article>
  );
};

export default ActiveBlogCard;
