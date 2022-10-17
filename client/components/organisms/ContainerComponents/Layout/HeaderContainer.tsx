import axios from 'axios';
import useSWR from 'swr';
import { getCookie } from '../../../../utils/Cookie';
import Header from '../../PresentationalComponents/Layout/Header';
import LoggedInHeader from '../../PresentationalComponents/Layout/LoggedInHeader';

const HeaderContainer = () => {
  const fetcher = async () => {
    const cookie = getCookie(document.cookie);
    if ('token' in cookie) return;

    try {
      const response = await axios.get<{ isLoggedIn: boolean }>(`${process.env.NEXT_PUBLIC_API_URL}/users/isLoggedIn`, {
        headers: {
          Authorization: `Bearer ${cookie['token']}`,
        },
      });
      return response.data.isLoggedIn;
    } catch (e) {
      return false;
    }
  };

  const { data } = useSWR(`${process.env.NEXT_PUBLIC_API_URL}/users/isLoggedIn`, fetcher);

  return data ? <LoggedInHeader /> : <Header />;
};

export default HeaderContainer;
