/*
	��֪һ��student�ṹ�壬���д��������Ϊstudent�ṹ�忪�ٶ�̬�洢�ռ䲢��ֵ��
	Ȼ�����student����Щֵ.
*/
#include<iostream>
#include<string.h>
using namespace std;
struct student
{
	char name[10];
	int num;
	char sex;
};
int main()
{
	struct student *Student;//����Student����
//C�ķ�����	Student = (struct student*)malloc(sizeof(struct student));
	Student = new	struct student;//C++�ķ���
	strcpy(Student->name,"XiaoMin");
	Student->num	=666;
	Student->sex	='M';
	printf("������%s	ѧ�ţ�%d	�Ա�%c\n",Student->name,Student->num,Student->sex);
//C�ķ�����free(Student);
	delete Student;//C++�ķ���
	return 0;
}
