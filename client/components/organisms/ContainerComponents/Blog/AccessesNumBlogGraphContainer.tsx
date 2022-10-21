import axios from 'axios';
import { useRouter } from 'next/router';
import useSWR from 'swr';
import AccessesNumBlogGraph from '../../PresentationalComponents/Blog/AccessesNumBlogGraph';

const AccessesNumBlogGraphContainer = () => {
  const router = useRouter();

  const fecher = async () => {
    if (!sessionStorage.getItem('token')) return;

    const start = new Date();
    const end = new Date();
    start.setMonth(start.getMonth() - 1);

    const accessesNum = (
      await axios.get<{ [date: string]: number }>(
        `${process.env.NEXT_PUBLIC_API_URL}/api/admin/blogs/${
          router.query.blogId
        }/accessesNum?start=${start.toISOString()}&end=${end.toISOString()}`,
        {
          headers: {
            Authorization: `Bearer ${sessionStorage.getItem('token')}`,
          },
        },
      )
    ).data;

    let result = {
      dates: [] as string[],
      values: [] as number[],
    };

    for (const date in accessesNum) {
      result.dates.push(date);
      result.values.push(accessesNum[date]);
    }

    return result;
  };

  const { data, error } = useSWR(
    `${process.env.NEXT_PUBLIC_API_URL}/api/admin/blogs/${router.query.blogId}/accessesNum`,
    fecher,
  );

  if (error) return <>error</>;
  if (!data) return <>loading...</>;

  return <AccessesNumBlogGraph {...data} />;
};

export default AccessesNumBlogGraphContainer;
