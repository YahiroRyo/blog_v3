import axios from 'axios';
import { useRouter } from 'next/router';
import useSWR from 'swr';
import { AccessedBrowserType } from '../../../../types/Blog/AccessedBrowserType';
import AccessedBrowserTypePie from '../../PresentationalComponents/Blog/AccessedBrowserTypePie';

const AccessedBrowserTypePieContainer = () => {
  const router = useRouter();

  const fecher = async () => {
    if (!sessionStorage.getItem('token')) return;

    const start = new Date();
    const end = new Date();
    start.setMonth(start.getMonth() - 1);
    end.setHours(end.getHours() + 9);

    return (
      await axios.get<AccessedBrowserType[]>(
        `${process.env.NEXT_PUBLIC_API_URL}/api/admin/blogs/${
          router.query.blogId
        }/accessedBrowserType?start=${start.toISOString()}&end=${end.toISOString()}`,
        {
          headers: {
            Authorization: `Bearer ${sessionStorage.getItem('token')}`,
          },
        },
      )
    ).data;
  };

  const { data, error, mutate } = useSWR(
    `${process.env.NEXT_PUBLIC_API_URL}/api/admin/blogs/${router.query.blogId}/accessedBrowserType`,
    fecher,
  );

  const onReload = async () => {
    if (!sessionStorage.getItem('token')) return;

    await axios.delete(
      `${process.env.NEXT_PUBLIC_API_URL}/api/admin/blogs/${router.query.blogId}/accessedBrowserType/cache`,
      {
        headers: {
          Authorization: `Bearer ${sessionStorage.getItem('token')}`,
        },
      },
    );

    mutate();
  };

  if (error) return <>error</>;
  if (!data) return <>loading...</>;

  return <AccessedBrowserTypePie onReload={onReload} accessedBrowserType={data} />;
};

export default AccessedBrowserTypePieContainer;
