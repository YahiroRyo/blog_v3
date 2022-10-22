import { useState } from 'react';
import { DetailActiveBlogMeta } from '../../../../types/Blog/DetailActiveBlogMeta';
import useSyntaxHighlight from '../../../atoms/SyntaxHighlight/syntaxHighlight';
import ActiveBlog from '../../PresentationalComponents/Blog/ActiveBlog';

const ActiveBlogContainer = (preProps: DetailActiveBlogMeta) => {
  useSyntaxHighlight();

  const [props, setProps] = useState<DetailActiveBlogMeta>({
    title: preProps.title,
    body: preProps.body,
    description: preProps.description,
    thumbnail: preProps.thumbnail,
    mainImage: preProps.mainImage,
  });

  return <ActiveBlog {...props} />;
};

export default ActiveBlogContainer;
