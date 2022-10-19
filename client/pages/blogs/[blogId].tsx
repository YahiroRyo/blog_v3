import axios from 'axios';
import { GetServerSideProps } from 'next';
import useSWR from 'swr';
import ActiveBlogContainer from '../../components/organisms/ContainerComponents/Blog/ActiveBlogContainer';
import SiteContainer from '../../components/organisms/ContainerComponents/Layout/SiteContainer';
import { DetailActiveBlog } from '../../types/Blog/DetailActiveBlog';
import { DetailActiveBlogMeta } from '../../types/Blog/DetailActiveBlogMeta';

type BlogProps = DetailActiveBlogMeta & {
  error: string;
};

const Blog = ({ title, body, thumbnail, mainImage, description, error }: BlogProps) => {
  return (
    <SiteContainer>
      {error === '' ? (
        <ActiveBlogContainer
          title={title}
          body={body}
          mainImage={mainImage}
          thumbnail={thumbnail}
          description={description}
        />
      ) : (
        <>{error}</>
      )}
    </SiteContainer>
  );
};

export default Blog;

export const getServerSideProps: GetServerSideProps = async (context) => {
  let result: BlogProps = {
    title: '',
    body: '',
    thumbnail: '',
    mainImage: '',
    description: '',
    error: '',
  };

  try {
    const response = await axios.get<DetailActiveBlog>(
      `${process.env.NEXT_PUBLIC_SSR_API_URL}/api/blogs/${context.query.blogId}`,
    );
    result.title = response.data.title;
    result.body = response.data.body;
    result.thumbnail = response.data.thumbnail;
    result.mainImage = response.data.mainImage;
    result.description = response.data.body.replaceAll('#', '').substring(0, 120);
  } catch (e) {
    console.log(e);
    result.error = '存在しないブログです';
  }

  return {
    props: result,
  };
};
