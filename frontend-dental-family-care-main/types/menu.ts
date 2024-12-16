interface menu {
    headTitle1?: string;
    headTitle2?: string;
    title?: string;
    icon?: string;
    type: string;
    badgeType?: string;
    badgeValue?: string;
    active: boolean;
    children?: menu[];
    path?: string;
    bookmark?: boolean;
}
export default menu