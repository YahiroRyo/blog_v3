import { useEffect, useState } from 'react';
import { DetailActiveBlogMeta } from '../../../../types/Blog/DetailActiveBlogMeta';
import ActiveBlog from '../../PresentationalComponents/Blog/ActiveBlog';

const ActiveBlogContainer = (preProps: DetailActiveBlogMeta) => {
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
