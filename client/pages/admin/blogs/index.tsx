import type { NextPage } from 'next';
import LinkButton from '../../../components/atoms/Button/LinkButton';
import BlogCardListContainer from '../../../components/organisms/ContainerComponents/Blog/BlogCardListContainer';
import SiteContainer from '../../../components/organisms/ContainerComponents/Layout/SiteContainer';

const Index: NextPage = () => {
  return (
    <SiteContainer useResize>
      <LinkButton type='button' href='/admin/blogs/create'>
        ブログを作成
      </LinkButton>
      <BlogCardListContainer />
    </SiteContainer>
  );
};

export default Index;
