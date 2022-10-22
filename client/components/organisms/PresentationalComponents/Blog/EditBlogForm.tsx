import { FormEvent } from 'react';
import Button from '../../../atoms/Button/Button';
import BackgroundImage from '../../../atoms/Image/BackgroundImage';
import ErrorText from '../../../atoms/Text/ErrorText';
import FileUploadGroup from '../../../molecules/Input/FileUploadGroup';
import InputGroup from '../../../molecules/Input/InputGroup';
import RadioButtonGroup from '../../../molecules/Input/RadioButtonGroup';
import PreviewMarkdown from '../../../molecules/Markdown/PreviewMarkdown';

type EditBlogFormProps = {
  title: string;
  mainImage: string;
  body: string;
  error: string;
  isActive: boolean;
  setTitle: (title: string) => void;
  setMainImage: (value: File) => void;
  setBody: (body: string) => void;
  setIsActive: (isActive: boolean) => void;
  editBlog: (e: FormEvent<HTMLFormElement>) => void;
};

const EditBlogForm = ({
  title,
  body,
  mainImage,
  error,
  isActive,
  setTitle,
  setMainImage,
  setBody,
  setIsActive,
  editBlog,
}: EditBlogFormProps) => {
  const values = [
    { label: '公開', value: true },
    { label: '非公開', value: false },
  ];

  return (
    <form action='POST' onSubmit={editBlog}>
      <RadioButtonGroup
        name='isActive'
        values={values}
        state={isActive}
        setState={(state) => setIsActive(state === 'true')}
        style={{ display: 'flex', columnGap: '1rem' }}
      />
      <InputGroup style={{ marginTop: '1rem' }} label='タイトル' type='text' value={title} setValue={setTitle} />
      {mainImage ? (
        <BackgroundImage
          style={{ border: '1px solid rgba(48, 48, 48, .25)', borderRadius: '.2rem', margin: '1rem 0' }}
          backgroundImage={mainImage}
          width={800}
          height={450}
        />
      ) : (
        <></>
      )}
      <FileUploadGroup style={{ marginTop: '1rem' }} setValue={setMainImage}>
        メインイメージをアップロード
      </FileUploadGroup>
      <PreviewMarkdown style={{ marginTop: '1rem' }} markdown={body} setMarkdown={setBody} />
      <ErrorText>{error}</ErrorText>
      <Button style={{ marginTop: '1rem' }} type='submit'>
        ブログ編集
      </Button>
    </form>
  );
};

export default EditBlogForm;
