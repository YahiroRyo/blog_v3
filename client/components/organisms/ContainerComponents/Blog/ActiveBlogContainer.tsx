import { useEffect, useState } from 'react';
import { DetailActiveBlogMeta } from '../../../../types/Blog/DetailActiveBlogMeta';
import useSyntaxHighlight from '../../../atoms/SyntaxHighlight/syntaxHighlight';
import ActiveBlog from '../../PresentationalComponents/Blog/ActiveBlog';

const ActiveBlogContainer = (preProps: DetailActiveBlogMeta) => {
  useSyntaxHighlight();

  const [image, setImage] = useState<string>('');

  useEffect(() => {
    const images = document.querySelectorAll('img');
    images.forEach((image) => {
      image.addEventListener('click', () => {
        setImage(image.src.replace('/thumb', ''));
      });
    });
  }, []);

  return (
    <>
      <ActiveBlog {...preProps} image={image} setImage={setImage} />
    </>
  );
};

export default ActiveBlogContainer;
