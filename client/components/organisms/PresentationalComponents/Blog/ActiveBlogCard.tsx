/** @jsxImportSource @emotion/react */
import { css, SerializedStyles } from '@emotion/react';
import Image from 'next/image';
import Link from 'next/link';
import { color } from '../../../../styles/color';
import Title from '../../../atoms/Text/Title';

type ActiveBlogCardProps = {
  blogId: string;
  title: string;
  thumbnail: string;
  style?: SerializedStyles;
};

const ActiveBlogCard = ({ blogId, title, thumbnail, style }: ActiveBlogCardProps) => {
  return (
    <article
      css={css`
        ${style}
        border-radius: 3rem;
        box-shadow: 0.8rem 0.8rem 2rem rgba(0, 0, 0, 0.25);
        transition: 0.1s;
        &:hover {
          cursor: pointer;
          box-shadow: 0.2rem 0.2rem 1rem rgba(0, 0, 0, 0.25);
        }
      `}
    >
      <Link href={`/blogs/${blogId}`}>
        <a
          css={css`
            background-color: ${color.white};
            border-radius: 1rem;
            padding: 2rem;
            display: flex;
            column-gap: 2rem;
            text-decoration: none;
          `}
        >
          <Image src={thumbnail} width={400} height={225} alt={`${title}のサムネイル`} />
          <Title>{title}</Title>
        </a>
      </Link>
    </article>
  );
};

export default ActiveBlogCard;
