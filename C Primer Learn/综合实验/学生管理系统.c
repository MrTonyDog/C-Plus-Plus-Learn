#include<stdio.h>
void menu(int p);
void stu_infor_into(struct stu stu1[],int n,int *c,int *e,int *z,int *trol);//*e:��ֹ�����ظ�ѧ��,*z�������û�������ʹ�ù���1
void stu_infor_put(struct stu stu1[],int n,int *c,int *e,int *z);
void stu_change_put(struct stu stu1[],int n,int *c,int *e,int *z);
void stu_search(struct stu stu1[],int n,int *c,int *e,int *z);
void stu_aver(struct stu stu1[],int n,int *c,int *e,int *z);
void stu_delete(struct stu stu1[],int n,int *c,int *e,int *z);
void stu_add(struct stu stu1[],int n,int *c,int *e,int *z);
void stu_overaver(struct stu stu1[],int n,int *c,int *e,int *z);
void stu_list(struct stu stu1[],int n,int *c,int *e,int *z);
int search(struct stu stu1[],int n,int x);
int search1(struct stu stu1[],int n,int x);
int sum(struct stu stu1[],int n);
int aver(struct stu stu1[],int n);
struct stu
	{
		char name[10];
		int num;
		float chinese;
		float math;
		float english;
	};
struct stu stu1[50];
void main()//������
{
	int p=1;
	menu(p);

}

void menu(int p)//�˵�����

{
	int x,y=0,n,c=0,q=0,qz=0,control=0;//n�������ѧ��������c�����������ѧ��������q:��ֹ�����ظ�ѧ��,qz�������û�������ʹ�ù���1.control:�����û�ֻ��ʹ��һ�ι���1.
	printf("\t���ڽ������ϵͳ�����Ժ󡣡���\n���棺ֻ��¼��50��ѧ���������������޷�¼�룡\n������Ҫ¼�����ϵͳ��ѧ������\n������������������������\n");
	scanf("%d",&n);
	printf("������������������������\n");
	while(p)
	{
		printf("����1��ѧ��������Ϣ¼��\n����2��ѧ��������Ϣ�����\n����3����ѧ�Ų�ѯѧ����Ϣ\n����4����ѧ���޸�ĳѧ����Ϣ�����\n����5����ÿ����ƽ���ɼ�\n����6��ɾ��ĳѧ����Ϣ\n����7�����ĳѧ����Ϣ\n����8�����ƽ���ִ���80�ֵ�ͬѧ��Ϣ\n����9�������ܳɼ���ƽ���ɼ��ۺ�����\n������������������������\n�����빦�ܶ�Ӧ������\n\n������������������������\n");
		scanf("%d",&x);
		printf("������������������������\n");
		switch(x)
		{
		default:printf("�˹��ܲ����ڣ�������������\n������������������������\n");break;
		case 1:if(control==0)stu_infor_into(stu1,n,&c,&q,&qz,&control);else printf("�ù���ֻ�ܽ���һ�Σ�\n");break;
		case 2:stu_infor_put(stu1,n,&c,&q,&qz);break;
		case 3:stu_search(stu1,n,&c,&q,&qz);break;
		case 4:stu_change_put(stu1,n,&c,&q,&qz);break;
		case 5:stu_aver(stu1,n,&c,&q,&qz);break;
		case 6:stu_delete(stu1,n,&c,&q,&qz);break;
		case 7:stu_add(stu1,n,&c,&q,&qz);break;
		case 8:stu_overaver(stu1,n,&c,&q,&qz);break;
		case 9:stu_list(stu1,n,&c,&q,&qz);break;
		}
	}
}

void stu_infor_into(struct stu stu1[],int n,int *c,int *e,int *z,int *trol)//1.ѧ��������Ϣ¼��ģ��
{
	int i,j,a[50];
	printf("�밴���������ʽ�������룡����\n����:\nѧ��\t����\t����\t��ѧ\tӢ��\n1 XiaoMin 100 100 100\n���ڿ�ʼ���룺\n");
	*e=0;
	for(i=0;i<n;i++)
	{
		scanf("%d %s %f %f %f",&stu1[i].num,stu1[i].name,&stu1[i].chinese,&stu1[i].math,&stu1[i].english);
		for(j=0;j<n;j++)
		{
			if(a[j]==stu1[i].num)
			{	printf("�����ظ�����ĳһѧ���ˣ��������½��뱾ģ�飡\n");
				break;
			}
		}
		if(a[j]==stu1[i].num)
		{	*e=*e+1;//��ֹ�ظ�ѧ��
			break;
		}
		a[i]=stu1[i].num;
		if(*c>=1)//���������ѧ������
		{	*c=*c-1;}
	}
	printf("���������ɣ�\n������������������������\n");
	*z=*z+1;
	if(*e!=1)
	*trol=*trol+1;
}

void stu_infor_put(struct stu stu1[],int n,int *c,int *e,int *z)//2.ѧ��������Ϣ���
{
	int i,x;
	if(*z>=1)
	{
		if(*e==1)
	{printf("����ʹ�ù���1�����ݿ����¼�룡\n������������������������\n");}
	else
	{
	
		printf("ѧ��\t����\t����\t��ѧ\tӢ��\n");
		for(i=0;i<n-*c;i++)
		{
		printf("%d\t",stu1[i].num);
		printf("%s\t",stu1[i].name);
		printf("%.2f\t",stu1[i].chinese);
		printf("%.2f\t",stu1[i].math);
		printf("%.2f\n",stu1[i].english);
		}
		printf("������������������������\n");
	}
	}
}

void stu_search(struct stu stu1[],int n,int *c,int *e,int *z)//3.��ѧ�Ų�ѯѧ����Ϣ
{
	int i,y,x;
	if(*z>=1)
	{
			if(*e==1)
			{printf("����ʹ�ù���1�����ݿ����¼�룡\n������������������������\n");}
		else
		{
				printf("��������Ҫ��ѯ��ѧ��ѧ��\n");
				scanf("%d",&x);
				printf("\n������������������������\n");
				y=search(stu1,n-*c,x);
			if(y==0)
			{
				printf("��ѧ�������ڣ�\n������������������������\n");
			}
			else
			{
				for(i=0;i<n-*c;i++)
				{
				if(stu1[i].num==y)
				printf("��ѧ����Ϣ���£�\nѧ��\t����\t����\t��ѧ\tӢ��\n%d\t%s\t%.2f\t%.2f\t%.2f\t",stu1[i].num,stu1[i].name,stu1[i].chinese,stu1[i].math,stu1[i].english);
				}
			}
		}
				printf("\n������������������������\n");
	}
}


void stu_change_put(struct stu stu1[],int n,int *c,int *e,int *z)//4.��ѧ���޸�ѧ����Ϣ�����
{

	int i,j,p=1,x;
		if(*z>=1)
	{
	if(*e==1)
	{printf("����ʹ�ù���1�����ݿ����¼�룡\n������������������������\n");}
	else
	{
	printf("�������ѧ��ѧ��\n");
	scanf("%d",&x);
	printf("������������������������\n��������Ҫ�޸ĵ�ѧ������:\n");
	printf("����1���޸�ѧ������\n����2:�޸����ĳɼ�\n����3���޸���ѧ�ɼ�\n����4���޸�Ӣ��ɼ�\n");
	scanf("%d",&j);
	printf("���ڽ����%d������...\n������������������������\n",j);
	switch(j)
	{
		case 1:i=search1(stu1,n-*c,x);printf("�������޸�����\n");scanf("%s",stu1[i].name);printf("�޸����\n������������������������\n");break;
		case 2:i=search1(stu1,n-*c,x);printf("�������޸�����\n");scanf("%f",&stu1[i].chinese);printf("�޸����\n������������������������\n");break;
		case 3:i=search1(stu1,n-*c,x);printf("�������޸�����\n");scanf("%f",&stu1[i].math);printf("�޸����\n������������������������\n");break;
		case 4:i=search1(stu1,n-*c,x);printf("�������޸�����\n");scanf("%f",&stu1[i].english);printf("�޸����\n������������������������\n");break;
		default:printf("�����ڴ˹��ܣ������½����ģ��!������������������������\n");break;
	}
	}
	}
}

void stu_aver(struct stu stu1[],int n,int *c,int *e,int *z)//5.��ÿ���˵�ƽ���ɼ�
{
	int i;float s;//stu_aver(stu1,n)
	if(*z>=1)
	{
	if(*e==1)
	{printf("����ʹ�ù���1�����ݿ����¼�룡\n������������������������\n");}
	else
	{
	printf("ѧ��\tƽ���ɼ�\n");
	for(i=0;i<n-*c;i++)
	{
		s=aver(stu1,i);
		printf("%s\t",stu1[i].name);
		printf("%.2f\n",s);
	}
	printf("\n������������������������\n");
	}
	}
}

void stu_delete(struct stu stu1[],int n,int *c,int *e,int *z)//6.ɾ��ĳѧ����Ϣ
{
	int i,x,j,y,p=0;
	if(*z>=1)
	{
	if(*e==1)
	{printf("����ʹ�ù���1�����ݿ����¼�룡\n������������������������\n");}
	else
	{
	printf("��������Ҫɾ����ѧ��ѧ��\n");
	scanf("%d",&x);
	y=search(stu1,n-*c,x);
	if(y==0)
	{
		printf("û�и�ѧ�ţ������½��뱾ģ�飡\n������������������������\n");
	}
	else
	{
		for(i=0;i<n-*c;i++)
		{
			while(stu1[i].num==x)
			{		p=p+1;
			for(j=i;j<n-*c;j++)
			{
			
				stu1[j].num=stu1[j+1].num;
				strcpy(stu1[j].name,stu1[j+1].name);
				stu1[j].chinese=stu1[j+1].chinese;
				stu1[j].math=stu1[j+1].math;
				stu1[j].english=stu1[j+1].english;
			}
			}
			
		}
		for(j=0;j<p;j++)
				*c=*c+1;
			printf("������������������������\n��ѧ�ŵ�ѧ����Ϣɾ�����\n\n������������������������\n");
	}
	}
	}
}
void stu_add(struct stu stu1[],int n,int *c,int *e,int *z)//7.���ĳѧ����Ϣ
{
	
	int i,x,j,p=0,a[50];
	if(*z>=1)
	{
	if(*e==1)
	{printf("����ʹ�ù���1�����ݿ����¼�룡\n������������������������\n");}
	else
	{
	printf("��������Ҫ��ӵ�ѧ������\n");
	scanf("%d",&x);
	printf("�밴���������ʽ�������룡����\n����:\nѧ��\t����\t����\t��ѧ\tӢ��\n1 XiaoMin 100 100 100\n���ڿ�ʼ���룺\n������������������������\n");
	for(i=0;i<n-*c;i++)
	{
		a[i]=stu1[i].num;
	}
	for(i=n-*c;i<n-*c+x;i++)
	{
		p=p+1;
		scanf("%d %s %f %f %f",&stu1[i].num,stu1[i].name,&stu1[i].chinese,&stu1[i].math,&stu1[i].english);
		for(j=0;j<n;j++)
		{
			if(a[j]==stu1[i].num)
			{	printf("�����ظ�����ĳһѧ���ˣ��������½��뱾ģ�飡\n");
			
				break;
			}
		}
		if(a[j]==stu1[i].num)
		{	*e=*e+1;//��ֹ�ظ�ѧ��
			break;
		}
		a[i]=stu1[i].num;
	}
	*e=*e-1;
	printf("������������������������\n");
	if(a[j]!=stu1[i].num)
	for(i=0;i<p;i++)
		*c=*c-1;
	}
	}
}

void stu_overaver(struct stu stu1[],int n,int *c,int *e,int *z)//8.���ƽ���ִ���80�ֵ�ͬѧ��Ϣ
{
	int i,s;
	if(*z>=1)
	{
	if(*e==1)
	{printf("����ʹ�ù���1�����ݿ����¼�룡\n������������������������\n");}
	else
	{
	printf("ƽ���ִ���80�ֵ�ͬѧ��Ϣ��\nѧ��\t����\t����\t��ѧ\tӢ��\n");
	for(i=0;i<n-*c;i++)
	{
		s=aver(stu1,i);
		if(s>80)
		{
			printf("%d\t%s\t%.2f\t%.2f\t%.2f\t\n",stu1[i].num,stu1[i].name,stu1[i].chinese,stu1[i].math,stu1[i].english);
		}
	}
	printf("������������������������\n");
	}
	}

}
void stu_list(struct stu stu1[],int n,int *c,int *e,int *z)//9.�����ܳɼ���ƽ���ɼ��ۺ�����
{
	int i,t,j,a[50],m[50],b,s,x,d,g=0;//n�������ѧ��������*c����������ѧ��������b:ѧ��ѧ�š�s��ƽ���ֻ��ܷ֡�x���û����롣d�����ڼ�����g�����ڿ��ơ�
	if(*z>=1)
	{
	if(*e==1)
	{printf("����ʹ�ù���1�����ݿ����¼�룡\n������������������������\n");}
	else
	{
	printf("��������ܳɼ�����ƽ���ɼ�����������\n����1��������ƽ��������������2���������ܳɼ�����\n");
	scanf("%d",&x);
	printf("������������������������\n");
	if(x==1)
	{
		for(i=0;i<n-*c;i++)
	{
		a[i]=aver(stu1,i);
	}
	for(i=0;i<n-*c;i++)
	{
		for(j=i;j<n-*c;j++)
		{
			if(a[i]<a[j])
			{
				t=a[i];
				a[i]=a[j];
				a[j]=t;
			}
		}
	}
			printf("ƽ���ִӸߵ�������˳��Ϊ:\n");
		for(i=0;i<n-*c;i++)
		{
			for(j=0;j<n-*c;j++)
			{
					g=0;
				s=aver(stu1,j);
				if(s==a[i])
				{
					b=search(stu1,n-*c,j);
					for(d=0;d<n-*c+1;d++)
					{
						if(m[d]==b)
						{
							g=g+1;
							break;//ʹ��j=j+1;
						}
					}
					if(g==0)
					{
							m[i]=b;
					printf("%s\n",stu1[j].name);
					break;
					}
				}
				
			}
		
						
		}	
	}
	else
	{
		if(x==2)
	{
		for(i=0;i<n-*c;i++)
	{
		a[i]=sum(stu1,i);
	}
	for(i=0;i<n-*c;i++)
	{
		for(j=i;j<n-*c;j++)
		{
			if(a[i]<a[j])
			{
				t=a[i];
				a[i]=a[j];
				a[j]=t;
			}
		}
	}
	
			printf("\n������������������������\n�ִܷӸߵ�������˳��Ϊ:\n");
			for(i=0;i<n-*c;i++)
		{
			for(j=0;j<n-*c;j++)
			{
					g=0;
				s=sum(stu1,j);
				if(s==a[i])
				{
					b=search(stu1,n-*c,j);
					for(d=0;d<n-*c;d++)
					{
						if(m[d]==b)
						{
							g=g+1;
							break;//ʹ��j=j+1;
						}
					}
					if(g==0)
					{
							m[i]=b;
					printf("%s\n",stu1[j].name);
					break;
					}
				}
				
			}
		
						
		}
		}
	}
			printf("\n������������������������\n");
	}
	}
}

int aver(struct stu stu1[],int n)//��ƽ����
{
	float aver;
	aver=(stu1[n].chinese+stu1[n].english+stu1[n].math)/3.0;
	return aver;
}
int search(struct stu stu1[],int n,int x)//���Һ���
{
	int i;
	for(i=0;i<n;i++)
	{
		if(stu1[i].num==x)
		{
			return stu1[i].num;
		}
	}
	return 0;
}
int search1(struct stu stu1[],int n,int x)//search��������ǿ
{
	int y,i;
	y=search(stu1,n,x);
	if(y==0)
	{
		printf("��ѧ�Ų����ڣ������½���˹��ܣ�");
	}
	  else
	  {
			for(i=0;i<n;i++)
			{
				if(stu1[i].num==y)
				{
					return i;
				}
			}
	  }
}
int sum(struct stu stu1[],int n)//���ܷ�
{
	float sum;
	sum=(stu1[n].chinese+stu1[n].math+stu1[n].english);
	return sum;
}