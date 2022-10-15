import Image from 'next/image';
import Link from 'next/link';
import { color } from '../../../../styles/color';
import Title from '../../../atoms/Text/Title';

type BlogCardProps = {
  blogId: string;
  title: string;
  thumbnail: string;
};

const BlogCard = ({ blogId, title, thumbnail }: BlogCardProps) => {
  return (
    <article>
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

export default BlogCard;
