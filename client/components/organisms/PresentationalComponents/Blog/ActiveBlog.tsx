import Head from 'next/head';
import Image from 'next/image';
import { DetailActiveBlogMeta } from '../../../../types/Blog/DetailActiveBlogMeta';
import Title from '../../../atoms/Text/Title';

const ActiveBlog = ({ title, body, thumbnail, mainImage, description }: DetailActiveBlogMeta) => {
  return (
    <>
      <Head>
        <title>{title} | rm -rf /</title>
        <meta name='description' content={description} />
        <meta name='twitter:card' content='summary_large_image' />
        <meta name='twitter:site' content='@yappi_chmod_777' />
        <meta name='twitter:title' content={title} />
        <meta name='twitter:description' content={description} />
        <meta name='og:title' content={title} />
        <meta property='og:type' content='website' />
        <meta name='og:url' content='https://yappi.jp' />
        <meta name='og:image' content={thumbnail} />
        <meta name='og:description' content={description} />
        <meta name='theme-color' content='#f8f8f8' />
      </Head>
      <Title>{title}</Title>
      <div style={{ display: 'flex', alignItems: 'center', justifyContent: 'center' }}>
        <Image src={mainImage} width={800} height={450} alt={`${title}のメインイメージ`} />
      </div>
      <div className='markdown-body' dangerouslySetInnerHTML={{ __html: body }} />
    </>
  );
};

export default ActiveBlog;
