/*
	��д���򣬴�����ǰĿ¼�´����ļ�book.dat�������е���Ϣ�����������ߣ������磬�۸�ȱ��浽���ļ�
	Ȼ��򿪴�����book.dat�ļ������ж�ȡ����ʾ����һ������Ϣ
*/
#include<iostream>
#include<fstream>
using namespace std;
int main()
{
	fstream fp;
	fp.open("book.dat",ios::out);//�ļ�д����
	fp<<"C++"<<" "<<"��ΰ"<<" "<<"�廪��ѧ"<<" "<<50<<endl;
	fp<<"C"<<" "<<"С��"<<" "<<"������ѧ"<<" "<<30<<endl;
	fp.close();
	
	fp.open("book.dat");//�ļ�������
	char title[10],author[10],publish[10];
	int price;
	
	cout<<"����\t"<<"����\t"<<"������\t"<<"�۸�\t"<<endl;
	fp>>title;
	while(!fp.eof())//���϶�д
	{
		fp>>author>>publish>>price;
		cout<<title<<"\t"<<author<<"\t"<<publish<<"\t"<<price<<"\t"<<endl;
		fp>>title;
	}
	
	fp.close();
	return 0;
}
