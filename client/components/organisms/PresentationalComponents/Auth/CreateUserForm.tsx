/** @jsxImportSource @emotion/react */
import { css } from '@emotion/react';
import { FormEvent } from 'react';
import Button from '../../../atoms/Button/Button';
import ErrorText from '../../../atoms/Text/ErrorText';
import InputGroup from '../../../molecules/Input/InputGroup';

type CreateUserFormProps = {
  error: string;
  email: string;
  password: string;
  setEmail: (email: string) => void;
  setPassword: (password: string) => void;
  submit: (e: FormEvent<HTMLFormElement>) => void;
};

const CreateUserForm = ({ error, email, password, setEmail, setPassword, submit }: CreateUserFormProps) => {
  return (
    <form action='POST' onSubmit={submit}>
      <InputGroup type='email' label='メールアドレス' value={email} setValue={setEmail} />
      <InputGroup
        type='password'
        style={css`
          margin-top: 1rem;
        `}
        label='パスワード'
        value={password}
        setValue={setPassword}
      />
      <ErrorText>{error}</ErrorText>
      <Button
        type='submit'
        style={css`
          display: flex;
          margin-top: 1rem;
          margin-left: auto;
        `}
      >
        ユーザー作成
      </Button>
    </form>
  );
};

export default CreateUserForm;
