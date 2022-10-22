import { ActiveBlog } from '../../../../types/Blog/ActiveBlog';
import ActiveBlogCardList from '../../PresentationalComponents/Blog/ActiveBlogCardList';

type ActiveBlogCardListContainerProps = {
  blogList: ActiveBlog[];
};

const ActiveBlogCardListContainer = ({ blogList }: ActiveBlogCardListContainerProps) => {
  return <ActiveBlogCardList blogList={blogList} />;
};

export default ActiveBlogCardListContainer;
