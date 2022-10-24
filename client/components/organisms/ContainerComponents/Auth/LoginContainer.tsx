import axios from 'axios';
import { FormEvent, useState } from 'react';
import LoginForm from '../../PresentationalComponents/Auth/LoginForm';

const LoginContainer = () => {
  const [email, setEmail] = useState<string>('');
  const [password, setPassword] = useState<string>('');
  const [error, setError] = useState<string>('');

  const login = async (e: FormEvent<HTMLFormElement>) => {
    e.preventDefault();

    try {
      await axios.get(`${process.env.NEXT_PUBLIC_API_URL}/sanctum/csrf-cookie`);
      const response = await axios.post<{ token: string }>(`${process.env.NEXT_PUBLIC_API_URL}/users/login`, {
        email: email,
        password: password,
      });

      sessionStorage.setItem('token', response.data.token);
      location.href = '/admin';
    } catch (e) {
      if (!axios.isAxiosError(e) || !e.response) {
        setError('不明なエラーが発生しました');
        return;
      }

      if (e.response.status === 400) {
        if ('メールアドレス' in e.response.data) {
          setError('メールアドレス : ' + e.response.data['メールアドレス']);
        }
        if ('パスワード' in e.response.data) {
          setError('パスワード : ' + e.response.data['パスワード']);
        }
        return;
      }

      if (e.response.status === 403) {
        setError('認証できませんでした');
        return;
      }

      setError(e.response.data);
    }
  };

  return (
    <LoginForm
      error={error}
      submit={login}
      email={email}
      setEmail={setEmail}
      password={password}
      setPassword={setPassword}
    />
  );
};

export default LoginContainer;
