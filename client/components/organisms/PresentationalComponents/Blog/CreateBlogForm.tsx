/** @jsxImportSource @emotion/react */
import { css } from '@emotion/react';
import { FormEvent } from 'react';
import Button from '../../../atoms/Button/Button';
import BackgroundImage from '../../../atoms/Image/BackgroundImage';
import ErrorText from '../../../atoms/Text/ErrorText';
import FileUploadGroup from '../../../molecules/Input/FileUploadGroup';
import InputGroup from '../../../molecules/Input/InputGroup';
import PreviewMarkdown from '../../../molecules/Markdown/PreviewMarkdown';

type CreateBlogFormProps = {
  title: string;
  mainImageBase64: string;
  body: string;
  error: string;
  setTitle: (title: string) => void;
  setMainImage: (value: File) => void;
  setBody: (body: string) => void;
  createBlog: (e: FormEvent<HTMLFormElement>) => void;
};

const CreateBlogForm = ({
  title,
  body,
  mainImageBase64,
  error,
  setTitle,
  setMainImage,
  setBody,
  createBlog,
}: CreateBlogFormProps) => {
  return (
    <form action='POST' onSubmit={createBlog}>
      <InputGroup label='タイトル' type='text' value={title} setValue={setTitle} />
      {mainImageBase64 ? (
        <BackgroundImage
          style={css`
            border: 1px solid rgba(48, 48, 48, 0.25);
            border-radius: 0.2rem;
            margin: 1rem 0;
          `}
          backgroundImage={mainImageBase64}
          width={800}
          height={450}
        />
      ) : (
        <></>
      )}
      <FileUploadGroup
        style={css`
          margin-top: 1rem;
        `}
        setValue={setMainImage}
      >
        メインイメージをアップロード
      </FileUploadGroup>
      <PreviewMarkdown
        style={css`
          margin-top: 1rem;
        `}
        markdown={body}
        setMarkdown={setBody}
      />
      <ErrorText>{error}</ErrorText>
      <Button
        style={css`
          margin-top: 1rem;
        `}
        type='submit'
      >
        ブログ作成
      </Button>
    </form>
  );
};

export default CreateBlogForm;
