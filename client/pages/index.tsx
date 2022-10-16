import type { NextPage } from 'next';
import ActiveBlogCardListContainer from '../components/organisms/ContainerComponents/Blog/ActiveBlogCardListContainer';
import SiteContainer from '../components/organisms/ContainerComponents/Layout/SiteContainer';

const Home: NextPage = () => {
  return (
    <SiteContainer>
      <ActiveBlogCardListContainer />
    </SiteContainer>
  );
};

export default Home;
