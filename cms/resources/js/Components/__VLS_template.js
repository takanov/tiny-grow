import { __VLS_publicComponent, __VLS_internalComponent, __VLS_componentsOption, __VLS_name, heading, form, input } from './BoardNameForm.vue';

function __VLS_template() {
let __VLS_ctx!: InstanceType<__VLS_PickNotAny<typeof __VLS_publicComponent, new () => {}>> & InstanceType<__VLS_PickNotAny<typeof __VLS_internalComponent, new () => {}>> & {};
/* Components */
let __VLS_otherComponents!: NonNullable<typeof __VLS_internalComponent extends { components: infer C; } ? C : {}> & typeof __VLS_componentsOption;
let __VLS_own!: __VLS_SelfComponent<typeof __VLS_name, typeof __VLS_internalComponent & typeof __VLS_publicComponent & (new () => { $slots: typeof __VLS_slots; })>;
let __VLS_localComponents!: typeof __VLS_otherComponents & Omit<typeof __VLS_own, keyof typeof __VLS_otherComponents>;
let __VLS_components!: typeof __VLS_localComponents & __VLS_GlobalComponents & typeof __VLS_ctx;
/* Style Scoped */
type __VLS_StyleScopedClasses = {};
let __VLS_styleScopedClasses!: __VLS_StyleScopedClasses | keyof __VLS_StyleScopedClasses | (keyof __VLS_StyleScopedClasses)[];
/* CSS variable injection */
/* CSS variable injection end */
let __VLS_resolvedLocalAndGlobalComponents!: {};
({} as __VLS_IntrinsicElements).div; ({} as __VLS_IntrinsicElements).div;
({} as __VLS_IntrinsicElements).h1; ({} as __VLS_IntrinsicElements).h1;
({} as __VLS_IntrinsicElements).form; ({} as __VLS_IntrinsicElements).form;
({} as __VLS_IntrinsicElements).input; ({} as __VLS_IntrinsicElements).input;
{
const __VLS_0 = ({} as __VLS_IntrinsicElements)["div"];
const __VLS_1 = __VLS_elementAsFunctionalComponent(__VLS_0);
({} as __VLS_IntrinsicElements).div;
({} as __VLS_IntrinsicElements).div;
const __VLS_2 = __VLS_1({ ...{}, class: ("flex flex-col items-start "), }, ...__VLS_functionalComponentArgsRest(__VLS_1));
({} as (props: __VLS_FunctionalComponentProps<typeof __VLS_0, typeof __VLS_2> & Record<string, unknown>) => void)({ ...{}, class: ("flex flex-col items-start "), });
const __VLS_3 = __VLS_pickFunctionalComponentCtx(__VLS_0, __VLS_2)!;
{
const __VLS_4 = ({} as __VLS_IntrinsicElements)["h1"];
const __VLS_5 = __VLS_elementAsFunctionalComponent(__VLS_4);
({} as __VLS_IntrinsicElements).h1;
({} as __VLS_IntrinsicElements).h1;
const __VLS_6 = __VLS_5({ ...{ onClick: {} as any, }, class: (([__VLS_ctx.isEditing ? 'absolute -left-[1000rem]' : ''])), ref: ("heading"), }, ...__VLS_functionalComponentArgsRest(__VLS_5));
({} as (props: __VLS_FunctionalComponentProps<typeof __VLS_4, typeof __VLS_6> & Record<string, unknown>) => void)({ ...{ onClick: {} as any, }, class: (([__VLS_ctx.isEditing ? 'absolute -left-[1000rem]' : ''])), ref: ("heading"), });
const __VLS_7 = __VLS_pickFunctionalComponentCtx(__VLS_4, __VLS_6)!;
// @ts-ignore
(__VLS_ctx.heading);
let __VLS_8 = { 'click': __VLS_pickEvent(__VLS_7.emit!, 'click' as const, ({} as __VLS_FunctionalComponentProps<typeof __VLS_5, typeof __VLS_6>).onClick) };
__VLS_8 = {
click: $event => {
__VLS_ctx.isEditing = true;
}
};
(__VLS_ctx.form.name);
(__VLS_7.slots!).default;
}
{
const __VLS_9 = ({} as __VLS_IntrinsicElements)["form"];
const __VLS_10 = __VLS_elementAsFunctionalComponent(__VLS_9);
({} as __VLS_IntrinsicElements).form;
({} as __VLS_IntrinsicElements).form;
const __VLS_11 = __VLS_10({ ...{}, action: (""), }, ...__VLS_functionalComponentArgsRest(__VLS_10));
({} as (props: __VLS_FunctionalComponentProps<typeof __VLS_9, typeof __VLS_11> & Record<string, unknown>) => void)({ ...{}, action: (""), });
const __VLS_12 = __VLS_pickFunctionalComponentCtx(__VLS_9, __VLS_11)!;
__VLS_directiveFunction(__VLS_ctx.vShow)((__VLS_ctx.isEditing));
{
const __VLS_13 = ({} as __VLS_IntrinsicElements)["input"];
const __VLS_14 = __VLS_elementAsFunctionalComponent(__VLS_13);
({} as __VLS_IntrinsicElements).input;
({} as __VLS_IntrinsicElements).input;
const __VLS_15 = __VLS_14({ ...{}, ref: ("input"), value: ((__VLS_ctx.form.name)), type: ("text"), placeholder: ("Board name"), class: ("hover:bg-white/20 whitespace-pre-wrap break-all border border-transparent rounded-md cursor-pointer px-3 py-1.5 text-2xl text-black font-bold"), }, ...__VLS_functionalComponentArgsRest(__VLS_14));
({} as (props: __VLS_FunctionalComponentProps<typeof __VLS_13, typeof __VLS_15> & Record<string, unknown>) => void)({ ...{}, ref: ("input"), value: ((__VLS_ctx.form.name)), type: ("text"), placeholder: ("Board name"), class: ("hover:bg-white/20 whitespace-pre-wrap break-all border border-transparent rounded-md cursor-pointer px-3 py-1.5 text-2xl text-black font-bold"), });
const __VLS_16 = __VLS_pickFunctionalComponentCtx(__VLS_13, __VLS_15)!;
// @ts-ignore
(__VLS_ctx.input);
}
(__VLS_12.slots!).default;
}
(__VLS_3.slots!).default;
}
if (typeof __VLS_styleScopedClasses === 'object' && !Array.isArray(__VLS_styleScopedClasses)) {
}
var __VLS_slots!: {};
// @ts-ignore
[isEditing, isEditing, heading, isEditing, form, isEditing, form, form, input,];
return __VLS_slots;
}
