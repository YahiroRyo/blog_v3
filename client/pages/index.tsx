import type { NextPage } from 'next';
import Head from 'next/head';
import ActiveBlogCardListContainer from '../components/organisms/ContainerComponents/Blog/ActiveBlogCardListContainer';
import SiteContainer from '../components/organisms/ContainerComponents/Layout/SiteContainer';

const Home: NextPage = () => {
  return (
    <SiteContainer useResize>
      <Head>
        <title>ブログ一覧 | rm -rf /</title>
      </Head>
      <ActiveBlogCardListContainer />
    </SiteContainer>
  );
};

export default Home;
