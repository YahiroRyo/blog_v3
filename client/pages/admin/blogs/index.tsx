import type { NextPage } from 'next';
import BlogCardListContainer from '../../../components/organisms/ContainerComponents/Blog/BlogCardListContainer';
import SiteContainer from '../../../components/organisms/ContainerComponents/Layout/SiteContainer';

const Index: NextPage = () => {
  return (
    <SiteContainer>
      <BlogCardListContainer />
    </SiteContainer>
  );
};

export default Index;
