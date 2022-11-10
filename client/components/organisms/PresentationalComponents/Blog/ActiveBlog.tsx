/** @jsxImportSource @emotion/react */
import Head from 'next/head';
import Image from 'next/image';
import { DetailActiveBlogMeta } from '../../../../types/Blog/DetailActiveBlogMeta';
import Title from '../../../atoms/Text/Title';
import 'highlight.js/styles/github.css';
import ImageModal from '../../../molecules/Modal/ImageModal';
import { css } from '@emotion/react';
import Text from '../../../atoms/Text/Text';

const ActiveBlog = ({
  title,
  body,
  thumbnail,
  mainImage,
  description,
  createdAt,
  image,
  setImage,
}: DetailActiveBlogMeta & { image?: string; setImage: (value: string) => void }) => {
  return (
    <>
      <Head>
        <title>{title} | rm -rf /</title>
        <meta name='description' content={description} />
        <meta name='twitter:card' content='summary_large_image' />
        <meta name='twitter:site' content='@yappi_chmod_777' />
        <meta name='twitter:creator' content='@yappi_chmod_777' />
        <meta name='twitter:domain' content='https://www.yappi.jp' />
        <meta name='twitter:title' content={title} />
        <meta name='twitter:description' content={description} />
        <meta name='og:title' content={title} />
        <meta property='og:type' content='website' />
        <meta name='og:site_name' content='yappiのゴミ箱 | rm -rf /' />
        <meta name='og:url' content='https://www.yappi.jp' />
        <meta name='og:image' content={thumbnail} />
        <meta name='og:description' content={description} />
        <meta name='theme-color' content='#f8f8f8' />
      </Head>
      <Title>{title}</Title>
      <Text
        style={css`
          letter-spacing: 1px;
          margin-bottom: 2rem;
        `}
      >
        ブログ作成日: {createdAt}
      </Text>
      {image ? <ImageModal onClose={() => setImage('')} alt={''} src={image} /> : <></>}
      <div
        css={css`
          display: flex;
          align-items: center;
          justify-content: center;
          margin: 16px 0;
        `}
      >
        <Image src={mainImage} width={800} height={450} alt={`${title}のメインイメージ`} />
      </div>
      <div className='markdown-body' dangerouslySetInnerHTML={{ __html: body }} />
    </>
  );
};

export default ActiveBlog;
