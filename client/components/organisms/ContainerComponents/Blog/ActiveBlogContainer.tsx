import { DetailActiveBlogMeta } from '../../../../types/Blog/DetailActiveBlogMeta';
import { markdownOfHTML } from '../../../../wasm-markdown/pkg/wasm_markdown';
import ActiveBlog from '../../PresentationalComponents/Blog/ActiveBlog';

const ActiveBlogContainer = (preProps: DetailActiveBlogMeta) => {
  const props: DetailActiveBlogMeta = {
    title: preProps.title,
    body: markdownOfHTML(preProps.body),
    description: preProps.description,
    thumbnail: preProps.thumbnail,
    mainImage: preProps.mainImage,
  };

  return <ActiveBlog {...props} />;
};

export default ActiveBlogContainer;
