import { FormEvent } from 'react';
import Button from '../../../atoms/Button/Button';
import ErrorText from '../../../atoms/Text/ErrorText';
import InputGroup from '../../../molecules/Input/InputGroup';

type LoginFormProps = {
  error: string;
  email: string;
  password: string;
  setEmail: (email: string) => void;
  setPassword: (password: string) => void;
  submit: (e: FormEvent<HTMLFormElement>) => void;
};

const LoginForm = ({ error, email, password, setEmail, setPassword, submit }: LoginFormProps) => {
  return (
    <form action='POST' onSubmit={submit}>
      <InputGroup label='メールアドレス' value={email} setValue={setEmail} />
      <InputGroup style={{ marginTop: '1rem' }} label='パスワード' value={password} setValue={setPassword} />
      <ErrorText>{error}</ErrorText>
      <Button type='submit' style={{ display: 'flex', marginTop: '1rem', marginLeft: 'auto' }}>
        ログイン
      </Button>
    </form>
  );
};

export default LoginForm;
