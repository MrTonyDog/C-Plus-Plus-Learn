#include<stdio.h>
#include<string.h>

//����
int encrypt(char *text,char *result,char *k)
{
    int l,i,j=0,z=0;
    for(l=0;text[l]!='\0';l++);
    for(i=0;i<l;i++)
    {
        result[z]=(text[i]-'a'+k[j]-'a')%26+'a';
        j++;
        z++;
    }
    return 0;
}

//����
int decrypt(char *text,char *result,char *k)
{
    int l,i,j=0,z=0;
    for(l=0;text[l]!='\0';l++);
    for(i=0;i<l;i++)
    {
        result[z]=(text[i]-k[j]+26)%26+'a';
        j++;
        z++;
    }
    return 0;
}

int main()
{
    char text[50]="";
    char result[50]="";
    char middle[50]="";
    char k[50]="";

    printf("�������ģ�\n");
    scanf("%[^\n]",text);
    
    printf("��������Կk��\n");
    scanf("%s",k);
    /**����**/
    encrypt(text,result,k);
    printf("����%s������Ϊ:%s\n",text,result);
    strcpy(middle,result);
    strcpy(result,text);
    strcpy(text,middle);
	
    /**����**/
    decrypt(text,result,k);
    printf("����%s������Ϊ:%s\n",text,result);
    return 0;
}
