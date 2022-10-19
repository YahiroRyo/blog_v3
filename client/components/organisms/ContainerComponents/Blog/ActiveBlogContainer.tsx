import { DetailActiveBlogMeta } from '../../../../types/Blog/DetailActiveBlogMeta';
import ActiveBlog from '../../PresentationalComponents/Blog/ActiveBlog';

const ActiveBlogContainer = (props: DetailActiveBlogMeta) => {
  return <ActiveBlog {...props} />;
};

export default ActiveBlogContainer;
