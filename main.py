import os
import streamlit as st
from utils import label_lsit

file = 'label/label_classify.csv'
han_re, she, tai, mai, han, tou, er_mu, bi_kou, jing_xiang, pi_fu, teng_tong, \
shen_zhi, chu_xue, hou_yin, qian_yin, yin_shi, xiong_fu, yan_mian, yue_jing, dai_xia = label_lsit(file)

path = 'data'
files = [os.path.join(path,j) for j in os.listdir(path)]

file_name = st.sidebar.selectbox("请选择文档", files)

with open(file_name, 'r', encoding='UTF-8') as f:
    text = f.read()

st.text_area('文本内容', value=text , key=None, height=300)

col1,col2,col3,col4 = st.columns(4)
sys_list = []
with col1:
    she_chosed = st.multiselect("舌", options=she, default=None)
    sys_list.extend(she_chosed) # 用extend而非append
    tai_chosed = st.multiselect("苔", options=tai, default=None)
    sys_list.extend(tai_chosed)
    mai_chosed = st.multiselect("脉", options=mai, default=None)
    sys_list.extend(mai_chosed)
    han_re_chosed = st.multiselect("寒热", options=han_re, default=None)
    sys_list.extend(han_re_chosed)
    han_chosed = st.multiselect("汗", options=han, default=None)
    sys_list.extend(han_chosed)

with col2:
    tou_chosed = st.multiselect("头", options=tou, default=None)
    sys_list.extend(tou_chosed)
    er_mu_chosed = st.multiselect("耳目", options=er_mu, default=None)
    sys_list.extend(er_mu_chosed)
    bi_kou_chosed = st.multiselect("鼻口唇齿咽", options=bi_kou, default=None)
    sys_list.extend(bi_kou_chosed)
    jing_xiang_chosed = st.multiselect("颈项背身四肢", options=jing_xiang, default=None)
    sys_list.extend(jing_xiang_chosed)
    xiong_fu_chosed = st.multiselect("胸腹", options=xiong_fu, default=None)
    sys_list.extend(xiong_fu_chosed)

with col3:
    yin_shi_chosed = st.multiselect("饮食", options=yin_shi, default=None)
    sys_list.extend(yin_shi_chosed)
    shen_zhi_chosed = st.multiselect("神志睡眠", options=shen_zhi, default=None)
    sys_list.extend(shen_zhi_chosed)
    yan_mian_chosed = st.multiselect("颜面肤色", options=yan_mian, default=None)
    sys_list.extend(yan_mian_chosed)
    pi_fu_chosed = st.multiselect("周身皮肤", options=pi_fu, default=None)
    sys_list.extend(pi_fu_chosed)
    teng_tong_chosed = st.multiselect("疼痛性质", options=teng_tong, default=None)
    sys_list.extend(teng_tong_chosed)

with col4:
    chu_xue_chosed = st.multiselect("出血", options=chu_xue, default=None)
    sys_list.extend(chu_xue_chosed)
    hou_yin_chosed = st.multiselect("后阴", options=hou_yin, default=None)
    sys_list.extend(hou_yin_chosed)
    qian_yin_chosed = st.multiselect("前阴", options=qian_yin, default=None)
    sys_list.extend(qian_yin_chosed)
    yue_jing_chosed = st.multiselect("月经", options=yue_jing, default=None)
    sys_list.extend(yue_jing_chosed)
    dai_xia_chosed = st.multiselect("带下", options=dai_xia, default=None)
    sys_list.extend(dai_xia_chosed)

text_all = '，'.join(sys_list)
st.write(text_all)

complaint = st.text_area('根据标准症状输入主诉症状，如有多个请用中文逗号隔开', value='' , key=None, height=20)

write_text = text_all + '\n' + complaint

if st.button('保存结果'):
    file = file_name.split('/')[1]
    save_name = os.path.join('output',file)
    with open(save_name, 'w', encoding='utf-8') as f:
        f.write(write_text)


path2 = 'output'
files2 = [os.path.join(path2,j) for j in os.listdir(path2)]

file_name2 = st.sidebar.selectbox("查看标注后的文档", files2)

with open(file_name2, 'r', encoding='UTF-8') as f:
    text2 = f.read()

text_biaozhu = st.text_area('标注后文档', value=text2 , key=None, height=50)

if st.button('修改标注后结果'):
    file = file_name2.split('/')[1]
    save_name = os.path.join('output',file)
    with open(save_name, 'w', encoding='utf-8') as f:
        f.write(text_biaozhu)