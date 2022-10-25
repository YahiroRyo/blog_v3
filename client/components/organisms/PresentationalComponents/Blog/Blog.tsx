/** @jsxImportSource @emotion/react */
import Image from 'next/image';
import { DetailBlog } from '../../../../types/Blog/DetailBlog';
import LinkButton from '../../../atoms/Button/LinkButton';
import useSyntaxHighlight from '../../../atoms/SyntaxHighlight/syntaxHighlight';
import Text from '../../../atoms/Text/Text';
import Title from '../../../atoms/Text/Title';
import 'highlight.js/styles/github.css';
import { css } from '@emotion/react';

const Blog = ({ title, body, mainImage, blogId, isActive }: DetailBlog) => {
  useSyntaxHighlight();

  return (
    <>
      <LinkButton type='button' href={`/admin/blogs/edit/${blogId}`}>
        編集
      </LinkButton>
      <Text
        style={css`
          margin-top: 1rem;
        `}
      >
        表示ステータス: {isActive ? '表示' : '非表示'}
      </Text>
      <Title
        style={css`
          margin-top: 1rem;
        `}
      >
        {title}
      </Title>
      <div
        css={css`
          display: flex;
          align-items: center;
          justify-content: center;
        `}
      >
        <Image src={mainImage} width={800} height={450} alt={`${title}のメインイメージ`} />
      </div>
      <div className='markdown-body' dangerouslySetInnerHTML={{ __html: body }} />
    </>
  );
};

export default Blog;
