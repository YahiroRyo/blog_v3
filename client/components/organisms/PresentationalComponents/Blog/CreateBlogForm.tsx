import { FormEvent } from 'react';
import Button from '../../../atoms/Button/Button';
import BackgroundImage from '../../../atoms/Image/BackgroundImage';
import ErrorText from '../../../atoms/Text/ErrorText';
import FileUploadGroup from '../../../molecules/Input/FileUploadGroup';
import InputGroup from '../../../molecules/Input/InputGroup';
import TextAreaGroup from '../../../molecules/Input/TextAreaGroup';

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
          style={{ border: '1px solid rgba(48, 48, 48, .25)', borderRadius: '.2rem', margin: '1rem 0' }}
          backgroundImage={mainImageBase64}
          width={800}
          height={450}
        />
      ) : (
        <></>
      )}
      <FileUploadGroup style={{ marginTop: '1rem' }} setValue={setMainImage}>
        メインイメージをアップロード
      </FileUploadGroup>
      <TextAreaGroup style={{ marginTop: '1rem' }} label='ブログ内容' value={body} setValue={setBody} />
      <ErrorText>{error}</ErrorText>
      <Button style={{ marginTop: '1rem' }} type='submit'>
        ブログ作成
      </Button>
    </form>
  );
};

export default CreateBlogForm;
