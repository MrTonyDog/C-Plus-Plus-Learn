/*
	��һ������4��Ԫ�ص��������飬�Ӽ���������4�����������飬�������������ֵ��ŵ������ļ�
	shuzu.txt
*/
#include<iostream>
using namespace std;
int main()
{
	printf("������4������\n");
	int a[4],i;
	for(i=0;i<4;i++)
		cin>>a[i];
	cout<<"------------------------------------"<<endl;
	for(i=0;i<4;i++)
		cout<<a[i]<<endl;
	
	FILE *fp;
	if((fp=fopen("shuzu.txt","wb"))==NULL)
	{
		cout<<"This File is not exit!"<<endl;
		exit(0);
	}
	for(i=0;i<4;i++)//�ļ���д
		fprintf(fp,"%d\n",a[i]);
	fclose(fp);
	return 0;
}
