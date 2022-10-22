import axios from 'axios';
import { marked } from 'marked';
import { GetStaticPaths, GetStaticProps } from 'next';
import ActiveBlogContainer from '../../components/organisms/ContainerComponents/Blog/ActiveBlogContainer';
import SiteContainer from '../../components/organisms/ContainerComponents/Layout/SiteContainer';
import { DetailActiveBlog } from '../../types/Blog/DetailActiveBlog';
import { DetailActiveBlogMeta } from '../../types/Blog/DetailActiveBlogMeta';

type BlogProps = DetailActiveBlogMeta & {
  error: string;
};

const Blog = ({ title, body, thumbnail, mainImage, description, error }: BlogProps) => {
  return (
    <SiteContainer useResize>
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

export const getStaticProps: GetStaticProps = async (context) => {
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
      `${process.env.NEXT_PUBLIC_SSR_API_URL}/api/blogs/${context.params?.blogId}`,
    );
    result.title = response.data.title;
    result.body = marked(response.data.body);
    result.thumbnail = response.data.thumbnail;
    result.mainImage = response.data.mainImage;
    result.description = response.data.body.replaceAll('#', '');
  } catch (e) {
    console.error(e);
    result.error = '存在しないブログです';

    return {
      props: result,
      revalidate: 1,
    };
  }

  return {
    props: result,
    revalidate: 1000 * 60 * 60 * 24 * 3,
  };
};

export const getStaticPaths: GetStaticPaths = async () => {
  return {
    paths: [],
    fallback: 'blocking',
  };
};
