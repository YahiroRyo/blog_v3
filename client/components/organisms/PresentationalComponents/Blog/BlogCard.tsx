/** @jsxImportSource @emotion/react */
import { css, SerializedStyles } from '@emotion/react';
import Image from 'next/image';
import Link from 'next/link';
import { color } from '../../../../styles/color';
import Text from '../../../atoms/Text/Text';
import Title from '../../../atoms/Text/Title';

type BlogCardProps = {
  blogId: string;
  title: string;
  thumbnail: string;
  isActive: boolean;
  style?: SerializedStyles;
};

const BlogCard = ({ blogId, title, thumbnail, isActive, style }: BlogCardProps) => {
  return (
    <article
      css={css`
        ${style}
        border-radius: 3rem;
        box-shadow: ${isActive ? '0.8rem 0.8rem 2rem rgba(0, 0, 0, .25)' : ''};
        &:hover {
          cursor: pointer;
        }
      `}
    >
      <Link href={`/admin/blogs/${blogId}`}>
        <a
          css={css`
            background-color: ${isActive ? color.white : color.gray};
            border-radius: 1rem;
            padding: 2rem;
            display: flex;
            column-gap: 2rem;
            text-decoration: none;
          `}
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
