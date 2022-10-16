import Image from 'next/image';
import { DetailActiveBlog } from '../../../../types/Blog/DetailActiveBlog';
import Title from '../../../atoms/Text/Title';

const ActiveBlog = ({ title, body, mainImage }: DetailActiveBlog) => {
  return (
    <>
      <Title>{title}</Title>
      <div style={{ display: 'flex', alignItems: 'center', justifyContent: 'center' }}>
        <Image src={mainImage} width={800} height={450} alt={`${title}のメインイメージ`} />
      </div>
      <div className='md' dangerouslySetInnerHTML={{ __html: body }} />
    </>
  );
};

export default ActiveBlog;