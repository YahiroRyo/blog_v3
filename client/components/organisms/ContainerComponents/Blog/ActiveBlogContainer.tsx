import { useEffect, useState } from 'react';
import { DetailActiveBlogMeta } from '../../../../types/Blog/DetailActiveBlogMeta';
import { markdownOfHTML } from '../../../../wasm-markdown/pkg/wasm_markdown';
import ActiveBlog from '../../PresentationalComponents/Blog/ActiveBlog';

const ActiveBlogContainer = (preProps: DetailActiveBlogMeta) => {
  const [props, setProps] = useState<DetailActiveBlogMeta>({
    title: preProps.title,
    body: preProps.body,
    description: preProps.description,
    thumbnail: preProps.thumbnail,
    mainImage: preProps.mainImage,
  });

  // useEffect(() => {
  //   setProps({
  //     ...props,
  //     body: markdownOfHTML(props.body),
  //   });
  // });

  return <ActiveBlog {...props} />;
};

export default ActiveBlogContainer;
