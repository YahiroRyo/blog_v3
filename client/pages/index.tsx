import axios from 'axios';
import type { GetStaticProps, NextPage } from 'next';
import Head from 'next/head';
import ActiveBlogCardListContainer from '../components/organisms/ContainerComponents/Blog/ActiveBlogCardListContainer';
import SiteContainer from '../components/organisms/ContainerComponents/Layout/SiteContainer';
import { ActiveBlog } from '../types/Blog/ActiveBlog';

type HomeProps = {
  blogList: ActiveBlog[];
};

const Home: NextPage<HomeProps> = ({ blogList }) => {
  return (
    <SiteContainer useResize>
      <Head>
        <title>ブログ一覧 | rm -rf /</title>
      </Head>
      <ActiveBlogCardListContainer blogList={blogList} />
    </SiteContainer>
  );
};

export default Home;

export const getStaticProps: GetStaticProps = async (context) => {
  try {
    const response = await axios.get<ActiveBlog[]>(`${process.env.NEXT_PUBLIC_SSR_API_URL}/api/blogs`);

    return {
      props: {
        blogList: response.data,
      },
      revalidate: 1000 * 60 * 60,
    };
  } catch (e) {
    console.error(e);

    return {
      props: {
        blogList: [],
      },
      revalidate: 1000 * 60,
    };
  }
};
