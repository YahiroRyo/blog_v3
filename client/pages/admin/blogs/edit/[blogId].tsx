import SiteContainer from '../../../../components/organisms/ContainerComponents/Layout/SiteContainer';
import dynamic from 'next/dynamic';

const EditBlogContainer = dynamic(
  () => import('../../../../components/organisms/ContainerComponents/Blog/EditBlogContainer'),
  { ssr: false },
);

const Blog = () => {
  return (
    <SiteContainer>
      <EditBlogContainer />
    </SiteContainer>
  );
};

export default Blog;
