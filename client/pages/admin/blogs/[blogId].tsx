import AccessesNumBlogGraphContainer from '../../../components/organisms/ContainerComponents/Blog/AccessesNumBlogGraphContainer';
import BlogContainer from '../../../components/organisms/ContainerComponents/Blog/BlogContainer';
import SiteContainer from '../../../components/organisms/ContainerComponents/Layout/SiteContainer';

const Blog = () => {
  return (
    <SiteContainer>
      <AccessesNumBlogGraphContainer />
      <BlogContainer />
    </SiteContainer>
  );
};

export default Blog;
