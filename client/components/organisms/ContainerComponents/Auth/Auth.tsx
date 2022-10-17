import axios from 'axios';
import { useRouter } from 'next/router';
import { useEffect } from 'react';

const Auth = () => {
  const router = useRouter();

  useEffect(() => {
    const main = async () => {
      if (!router.pathname.includes('/admin')) return;
      if (router.pathname === '/admin' || router.pathname === '/admin/login' || router.pathname === '/admin/create') {
        return;
      }

      if (!sessionStorage.getItem('token')) router.push('/');

      try {
        const response = await axios.get<{ isLoggedIn: boolean }>(
          `${process.env.NEXT_PUBLIC_API_URL}/users/isLoggedIn`,
          {
            headers: {
              Authorization: `Bearer ${sessionStorage.getItem('token')}`,
            },
          },
        );
        if (!response.data.isLoggedIn) {
          router.push('/');
        }
      } catch (e) {
        router.push('/');
      }
    };

    main();
  });

  return <></>;
};

export default Auth;
